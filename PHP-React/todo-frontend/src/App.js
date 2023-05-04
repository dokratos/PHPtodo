import axios from 'axios';
import './App.css';
import { useEffect } from 'react';
import Form from './components/Form';


function App() {
  // useEffect(() => {
  //   axios.get('http://localhost:8888').then((res) => console.log(res));
  // }, []);

  return (
    <main className='App'>
      <Form />
    </main>
  );
}

export default App;
