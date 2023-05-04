import React, {useState} from 'react';
import axios from 'axios';
import { Input, Button } from '@chakra-ui/react';

const Form = () => {
  const [value, setValue] = useState();
  console.log(value);

  const submit = (value) => {
    axios.post('http://localhost:8888', {value}).then(res => (res))
  }
  return (
    <form>
      <Input placeholder='Basic usage' onChange={e => setValue(e.target.value)} />
      <Button colorScheme='blue' onClick={submit}>Button</Button>
    </form>
  )
}

export default Form