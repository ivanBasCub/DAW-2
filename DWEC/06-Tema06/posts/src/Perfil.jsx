import { useEffect, useState } from "react";
import { Link, useParams } from "react-router";

export default function Perfil () {
    const { userid } = useParams();
    const [ user, setUser ] = useState(null);
    const [ albums, setAlbums] = useState([]);
    const [ toDo, setToDo] = useState([]);

    useEffect(() => {
        async function fecthUser() {
            const res = await fetch(`https://jsonplaceholder.typicode.com/users/${userid}`);
            const result = await res.json()
            setUser(result)
            
        }

        async function fecthAlbums() {
            const res = await fetch(`https://jsonplaceholder.typicode.com/users/${userid}/albums`)
            const result = await res.json()
            setAlbums(result)

        }
        
        async function fecthToDo() {
            const res = await fetch(`https://jsonplaceholder.typicode.com/users/${userid}/todos`)    
            const result = await res.json()
            setToDo(result)
        }

        fecthUser()
        fecthAlbums()
        fecthToDo()
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
                    <h3>Albums</h3>
                    <ul>
                        {albums.map(album =>
                            <li className="album" key={album.id}>{album.title}</li>
                        )}
                    </ul>
                    <h3>To Do</h3>
                    <ul>
                        {toDo.map(todo =>
                            <li className="album" key={todo.id}>{todo.title}</li>
                        )}
                    </ul>
                    <Link to="/">Volver al menu principal</Link>
                </>
            )}
        </div>
    )
}
