// import logo from './logo.svg';
// import './App.css';
import axios from 'axios';
import { useEffect } from 'react';


function App() {
  useEffect(() => {
    axios.get('http://localhost:8888').then((res) => console.log(res));
  }, []);

  return (
    <div>

    </div>
  );
}

export default App;
