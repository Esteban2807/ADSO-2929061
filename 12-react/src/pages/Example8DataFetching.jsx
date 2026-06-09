import { useEffect, useState } from "react";

function Example8DataFetching() {
  const [personajes, setPersonajes] = useState([]);
  const [personaje, setPersonaje] = useState([]);
  const [selectedPersonaje, setSelectedPersonaje] = useState(null);
  const url = `https://rickandmortyapi.com/api/character`;
  const [URL, setURL] = useState("");
  function selectPersonaje(id) {
    setSelectedPersonaje(id);
    setURL(`https://rickandmortyapi.com/api/character/${selectedPersonaje}`);
  }
  useEffect(() => {
    fetch(url)
      .then((response) => response.json())
      .then((data) => setPersonajes(data.results))
      .catch((error) => console.log(error));
    fetch(URL)
      .then((response) => response.json())
      .then((data) => setPersonaje(data.results))
      .catch((error) => console.log(error));
  }, [url, URL]);

  console.log(personaje);

  return (
    <>
      <div>
        {" "}
        <h1>Lista de Personajes</h1>
        {personajes.map((element) => (
          <>
            {" "}
            <h2 key={element.id}>{element.name}</h2>
            <button onClick={selectPersonaje(element.id)}>
              Seleccionar
            </button>{" "}
          </>
        ))}
        ;
      </div>
      <div>
        <h2>Personaje seleccionado</h2>
        <p>{personaje.name}</p>
      </div>
    </>
  );
}
export default Example8DataFetching;
