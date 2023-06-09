let ulr; /* "http://localhost/ArTeM02-066/Campers-API/backend/controllers/campers.php?op=getAll" */


export const getProductos = async () =>{
    try{
        const result = await fetch (url);
        const productos = await result.json();
        return productos;
        
    }
    catch(error){
        console.log(error);
    }
}