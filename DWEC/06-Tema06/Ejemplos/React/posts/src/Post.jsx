import { useState, useEffect } from "react";

export default function Posts(){
    const [posts, setPosts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function fecthPosts() {
            const res = await fetch("https://jsonplaceholder.typicode.com/posts")
            const postList = await res.json()
            setPosts(postList)
            setLoading(false)
        }
        fecthPosts()
    }, []) // La segunda condicion es cuando se modifica unas variables

    return (
        <div className="post-list">
            {posts.map(post =>
                <div className="post" key={post.id}>
                    <h1>{post.title}</h1>
                    <p>{post.body}</p>
                </div>
            )}
        </div>
    )
}