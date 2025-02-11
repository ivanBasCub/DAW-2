import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
/*
  Anotaciones 
    - Para la importación de modulos si es el caso de ser un archivo local tiene que ser ./
    - Tambien se puede poner export default directamente en la función
    - Se puede editar el nombre del modulo con as cuando lo importas
    - Solo puede tener un elemento principal
*/

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App />
  </StrictMode>,
)
