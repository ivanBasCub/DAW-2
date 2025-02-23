import { useState } from 'react'
import {BrowserRouter, Routes, Route} from 'react-router'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import Posts from "./Post.jsx"
import Perfil from './Perfil.jsx'

import './App.css'

function App() {
  const [count, setCount] = useState(0)

  return (
    <BrowserRouter>
      <Routes>
        <Route path='/' element={<Posts />} />
        <Route path='/usuario/:userid' element={<Perfil />} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
