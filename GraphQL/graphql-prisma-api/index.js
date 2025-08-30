// ApolloServer → GraphQL サーバー本体を使えるようにする
// gql → GraphQL スキーマ文字列を扱いやすくする（後述）
const { ApolloServer, gql } = require('apollo-server');
// PrismaClient → DB に安全にアクセスするクライアントを使えるようにする
const { PrismaClient } = require('@prisma/client');

// Prisma Client の初期化
const prisma = new PrismaClient();

// GraphQL のスキーマ定義
// gql`〜`の内部はGraphQL のスキーマ定義として解釈される
// GraphQLではschema.prismaとは異なり、デフォルトでNULL許容になるため、「型!」としないとNOT NULL制約が適用されない
// GraphQL のスキーマのうち、Query と Mutation は必ず定義する必要が特別な組み込み型S
const typeDefs = gql`
  type User {
    id: Int!
    name: String!
    email: String!
  }

  # データ取得用の操作（読み取り）
  # [User]   → 配列（リスト）を返す ことを示す
  # [User!]  → 配列の中の 各要素が NULL でないことを保証  ※配列の長さが 0 でも OK（空配列は許される）
  # [User!]! → 配列の中の 各要素が NULL でないことを保証し、空配列も許されない
  type Query {
    users: [User!]!
  }

  # データ更新用の操作（書き込み）
  type Mutation {
    createUser(name: String!, email: String!): User!
  }
`;

// Resolver → クエリやミューテーションの実行時に実行される関数を定義する
const resolvers = {
  Query: {
    // async () => {...} 非同期関数として定義
    users: async () => {
      // prisma.user.findMany()
      //     prisma     → PrismaClient のインスタンス
      //     user       → chema.prisma 内のモデル名 User に対応（Prisma Client ではモデル名の先頭を小文字にしたものがプロパティとして作られる） 
      //     findMany() → 非同期関数で、DBから条件に合致するレコードを全件取得して配列として返す
      // await → 非同期関数の結果を待つ
      return await prisma.user.findMany();
    },
  },
  Mutation: {
    // async (_, args) => {...} 
    //     _    → 第一引数は、親オブジェクト（今回は使用しない）
    //     args → 第二引数は、クライアントから渡された引数を受け取るオブジェクト（クライアント：リクエストを送信する媒体）
    createUser: async (_, args) => {
      // args から必要なプロパティを取り出す
      const { name, email } = args;
      // prisma.user.create()
      //     prisma      → PrismaClient のインスタンス
      //     user        → chema.prisma 内のモデル名 User に対応（Prisma Client ではモデル名の先頭を小文字にしたものがプロパティとして作られる） 
      //     create()    → 非同期関数で、DBに新しいレコードを作成して返す
      //     data: {...} → 作成するレコードのデータ（schema.prisma で定義したモデルのカラムを指定可）
      // await → 非同期関数の結果を待つ
      return await prisma.user.create({
        data: { name, email },
      });
    },
  },
};

// Apollo Server 初期化
// GraphQL のリクエストを受け取り、typeDefs と resolvers を使って処理を返すサーバー本体を作成
// もし GraphQL を使用していない node.js のプロジェクトなら使用していない（GraphQL専用）
const server = new ApolloServer({ typeDefs, resolvers });

// サーバー起動
server.listen().then(({ url }) => {
  console.log(`🚀 Server ready at ${url}`);
});
