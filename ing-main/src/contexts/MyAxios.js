
import axios from "axios";


export const myAxios = axios.create({
    baseURL: 'https://localhost:8000/', 
    timeout: 10000, 
    headers: {
        'Content-Type': 'application/json' 
    },
});