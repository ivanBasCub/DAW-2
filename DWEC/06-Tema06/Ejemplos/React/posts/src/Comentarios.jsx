import { useState, useEffect } from "react"
import { Link } from "react-router";

// Se pasan parametros
const Comentarios = ({ postId }) =>{
    const [list, setList] = useState([]);
    const [cargado, setCargado] = useState(false);

    async function onToggle(e) {
        if (!cargado) {
            setCargado(true);
            const res = await fetch("https://jsonplaceholder.typicode.com/posts/"+ postId +"/comments");
            const result = await res.json();
            setList(result);
        }
    }

    return (<details onToggle={onToggle}>
        <summary>Comentarios</summary>
        {list.map(comment => 
                <div className="coment" key={comment.id}>

                    <Link to={`/usuario/${postId}`}>{comment.name}</Link>
                    <p>Comentario: {comment.body}</p>
                </div>

        )}
    </details>)
}


export default Comentarios