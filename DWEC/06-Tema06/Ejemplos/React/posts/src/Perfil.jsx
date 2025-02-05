import { useParams } from "react-router";

export default function Perfil () {
    const { userid } = useParams();

    return <>{userid}</>
}