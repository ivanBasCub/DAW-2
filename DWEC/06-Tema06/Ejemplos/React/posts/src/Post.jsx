import { useState, useEffect } from "react";

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

        async function fecthUsers() {
            const res = await fetch("https://jsonplaceholder.typicode.com/users");
            const userList = await res.json()

            setUsers(userList)
        }
        fecthPosts()
        fecthUsers()
    }, []) // La segunda condicion es cuando se modifica unas variables

    return (
        <div className="post-list">
            {posts.map(post =>
                <div className="post" key={post.id}>
                    <h1>{post.title}</h1>
                    <p>
                        {users[post.userId-1].username}
                    </p>
                    <p>{post.body}</p>
                </div>
            )}
        </div>
    )
}