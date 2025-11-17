type Knight = {
    hp: number 
    mp: number
    weapon: string
    swordSkill: string
}

type Wizard = {
    hp: number
    mp: number
    weapon: string
    shield: boolean
    magicSkill: string
}

// 職業が増えると大変
// 共通するプロパティを切り出して拡張する

type CharacterBase = {
    hp: number
    mp: number
    weapon: string
}

type Knight2 = CharacterBase & {
    swordSkill: string
}

type Wizard2 = CharacterBase & {
    shield: boolean
    magicSkill: string
}



