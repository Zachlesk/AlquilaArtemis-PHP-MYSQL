const url = "http://localhost/AquilaArtemis/fullstack/backend/controllers/productos/";

export const getProductos = async () => {
  try {
    const result = await fetch(url + `getProductos.php`);
    const datosPersonas = await result.json();
    return datosPersonas;
  } catch (error) {
    console.log(error);
  }
};
