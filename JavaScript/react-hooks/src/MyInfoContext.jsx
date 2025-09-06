import { createContext } from 'react';

const myInfo = {
  name: 'John',
  age: 28,
  city: 'New York'
};

const MyInfoContext = createContext(myInfo);

export default MyInfoContext;
export { myInfo };
