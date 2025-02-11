import { useEffect, useState } from "react"

export default function Objects(){
    const [objects, setObjects] = useState([])

    useEffect(() => {
        async function fetchObjects(token){
            const result = await fetch("http://localhost:3000/object",{
                method:"POST", // Metodo que usaremos para el fecth
                headers:{   // Autenticacion del token
                    "Content-Type": "application/json",
                    "Autorization": `Bearer ${token}`
                }
            }).then(res => res.json())

            setObjects(result)
        }

        fetchObjects();
    },[]);

    return <></>
}