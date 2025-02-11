import {BrowserRouter, Routes, Route} from 'react-router'
import Objects from "./Objects"
import './App.css'

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Objects />} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
