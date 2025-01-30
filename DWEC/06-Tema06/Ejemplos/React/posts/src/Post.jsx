import { useState, useEffect } from "react";
import Comentarios from "./Comentarios";

export default function Posts(){
    const [posts, setPosts] = useState([]);
    const [users, setUsers] = useState([]);

    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function fecthPosts() {
            const resPost = await fetch("https://jsonplaceholder.typicode.com/posts")
            const postList = await resPost.json()

            setPosts(postList)
            setLoading(false)
        }

       
        fecthPosts()
        
    }, []) // La segunda condicion es cuando se modifica unas variables
    
    useEffect(()=>{
        async function fecthUsers() {
            const res = await fetch("https://jsonplaceholder.typicode.com/users");
            const userList = await res.json()

            setUsers(userList)
        }
        fecthUsers()
    }, [])

    return (
        <div className="post-list">
            {posts.map(post =>
                <div className="post" key={post.id}>
                    <h1>{post.title}</h1>
                    <p></p>
                    <p>{post.body}</p>
                    <Comentarios postId={post.id} />
                </div>
            )}
        </div>
    )
}