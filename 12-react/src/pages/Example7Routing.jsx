import { Routes, Route, Link, useLocation } from "react-router-dom";
import { BtnBack } from "../components/BtnBack";
function GeneralInfo() {
  return (
    <div style={stylesGeneralInfo}>
      <h3>📊 General Information</h3>
      <p>
        Wrlcome to the Pokémon region. Here you'll find basic information about
        the Pokémon world
      </p>
      <ul>
        <li>Regions: Kanto,Johto,Hoenn,Sinnoh</li>
        <li>Types: 18 different types</li>
        <li>Know Pokémon: 898+</li>
      </ul>
    </div>
  );
}
function PokemonList() {
  const pokemonList = [
    "Bulbasaur",
    "Charmander",
    "Squirtle",
    "Pikachu",
    "Eevee",
  ];
  return (
    <div
      style={{
        padding: "20px",
        background: "#fff",
        color: "#333",
        borderRadius: "5px",
      }}
    >
      <h3>Starter Pokémon</h3>
      <ul>
        {pokemonList.map((pokemon, index) => (
          <li key={index}>{pokemon}</li>
        ))}
      </ul>
    </div>
  );
}

function PokemonDetails() {
  const location = useLocation();
  const searchParams = new URLSearchParams(location.search);
  const pokemon = searchParams.get("name") || "unknown";

  return (
    <div
      style={{
        padding: "20px",
        background: "#e8f5e8",
        color: "#333",
        borderRadius: "5px",
      }}
    >
      <h3>🔍 Pokémon Details</h3>
      <p>
        Showing details for: <strong>{pokemon}</strong>
      </p>
      {pokemon !== "unknown" && (
        <div>
          <p>Additional information aboyt {pokemon}...</p>
          <img
            src={`https://official-artwork/${
              pokemon === "Pikachu"
                ? 25
                : pokemon === "Charmander"
                  ? 4
                  : pokemon === "Bulbasaur"
                    ? 1
                    : 7
            }.png`}
            alt={pokemon}
            style={{ width: "160px" }}
          />
        </div>
      )}
    </div>
  );
}
function InternalNavigation() {
  return (
    <nav style={stylesMenu}>
      <Link to="example7" style={linkStyle}>
        🏡 Home
      </Link>
      <Link to="example7/list" style={linkStyle}>
        List
      </Link>
      <Link to="example7/details?name=Pikachu" style={linkStyle}>
        ⚡ Pikachu
      </Link>
      <Link to="example7/details?name=Charmander" style={linkStyle}>
        🔥 Charmander
      </Link>
    </nav>
  );
}

function Example7Routing() {
  return (
    <div className="container">
      <BtnBack />
      <h2>Example 7: React Router</h2>
      <p>Navigation between different 'pages' without reloading the browser.</p>
      <InternalNavigation />
      <Routes>
        <Route path="/" element={<GeneralInfo />}></Route>
        <Route path="/list" element={<PokemonList />}></Route>
        <Route path="/details" element={<PokemonDetails />}></Route>
      </Routes>
    </div>
  );
}

export default Example7Routing;
