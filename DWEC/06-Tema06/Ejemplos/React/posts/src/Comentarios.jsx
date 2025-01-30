import { useState, useEffect } from "react"

// Se pasan parametros
const Comentarios = ({ postId }) =>{
    const [list, setList] = useState([]);


    useEffect(() => {
        async function fecthComments() {
            const res = await fetch("https://jsonplaceholder.typicode.com/comments");
            const result = await res.json();

            setList(result);
        }

        fecthComments();
    },[])
    
    return (<details>
        <summary>Comentarios</summary>
        {list.map(comment => {
            
            if(parseInt(comment.postId) == parseInt(postId)){
                return <div className="coment" key={comment.id}>
                    <p>Comentario: {comment.body}</p>
                    
                </div>
            }
        })}
    </details>)
}


export default Comentarios