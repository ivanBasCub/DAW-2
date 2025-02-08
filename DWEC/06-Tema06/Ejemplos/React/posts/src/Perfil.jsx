<<<<<<< HEAD
import { useEffect, useState } from "react";
import { Link, useParams } from "react-router";

export default function Perfil () {
    const { userid } = useParams();
    const [ user, setUser ] = useState(null);

    useEffect(() => {
        async function fecthUser() {
            const res = await fetch(`https://jsonplaceholder.typicode.com/users/${userid}`);
            const result = await res.json()
            setUser(result)
            
        }

        fecthUser()

    },[userid])

    return (
        <div className="user" key={userid}>
            {user && (
                <>
                    <h1>{user.username}</h1>
                    <p>Name: {user.name}</p>
                    <p>Email: {user.email}</p>
                    <p>Phone Number: {user.phone}</p>
                    <p>Address: {user.address.street} {user.address.suite} {user.address.city} </p>
                    <p>Company: {user.company.name}</p>
                    <Link to="/">Volver al menu principal</Link>
                </>
            )}
        </div>
    )
}
=======
import { useParams } from "react-router";

export default function Perfil () {
    const { userid } = useParams();

    return <>{userid}</>
}
>>>>>>> e50a790c12bd4aad2217ccae2d7d3cbf694a1f64
