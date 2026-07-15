import { Routes, Route, Link, useLocation } from "react-router-dom";
import { BtnBack } from "../components/BtnBack";

function GeneralInfo() {
  return (
    <div style={styles.card}>
      <h3>📊 General Information</h3>
      <p>
        Welcome to the Pokémon region. Here you'll find basic information about
        the Pokémon world.
      </p>

      <ul>
        <li>Regions: Kanto, Johto, Hoenn, Sinnoh</li>
        <li>Types: 18 different types</li>
        <li>Known Pokémon: 898+</li>
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
    <div style={styles.card}>
      <h3>🌱 Starter Pokémon</h3>

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
  const pokemon = searchParams.get("name") || "Unknown";

  const pokemonId =
    pokemon === "Pikachu"
      ? 25
      : pokemon === "Charmander"
      ? 4
      : pokemon === "Bulbasaur"
      ? 1
      : pokemon === "Squirtle"
      ? 7
      : 133;

  return (
    <div style={styles.detailsCard}>
      <h3>🔍 Pokémon Details</h3>

      <p>
        Showing details for: <strong>{pokemon}</strong>
      </p>

      {pokemon !== "Unknown" && (
        <>
          <p>Additional information about {pokemon}...</p>

          <img
            src={`https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${pokemonId}.png`}
            alt={pokemon}
            style={styles.image}
          />
        </>
      )}
    </div>
  );
}

function InternalNavigation() {
  return (
    <nav style={styles.menu}>
      <Link to="example7" style={styles.link}>
        🏡 Home
      </Link>

      <Link to="example7/list" style={styles.link}>
        📋 List
      </Link>

      <Link to="example7/details?name=Pikachu" style={styles.link}>
        ⚡ Pikachu
      </Link>

      <Link to="example7/details?name=Charmander" style={styles.link}>
        🔥 Charmander
      </Link>
    </nav>
  );
}

function Example7Routing() {
  return (
    <div style={styles.container}>
      <BtnBack />

      <h2>Example 7: React Router</h2>

      <p>
        Navigation between different pages without reloading the browser.
      </p>

      <InternalNavigation />

      <Routes>
        <Route path="/" element={<GeneralInfo />} />
        <Route path="/list" element={<PokemonList />} />
        <Route path="/details" element={<PokemonDetails />} />
      </Routes>
    </div>
  );
}

export default Example7Routing;

/* =======================
        STYLES
======================= */

const styles = {
  container: {
    maxWidth: "850px",
    margin: "40px auto",
    padding: "25px",
    background: "#f5f7fb",
    borderRadius: "12px",
    boxShadow: "0 4px 12px rgba(0,0,0,.15)",
    fontFamily: "Arial, sans-serif",
  },

  menu: {
    display: "flex",
    gap: "12px",
    flexWrap: "wrap",
    margin: "20px 0",
  },

  link: {
    textDecoration: "none",
    background: "#1976d2",
    color: "#fff",
    padding: "10px 18px",
    borderRadius: "8px",
    fontWeight: "bold",
    transition: "0.3s",
  },

  card: {
    background: "#fff",
    padding: "20px",
    borderRadius: "10px",
    color: "#333",
    boxShadow: "0 2px 8px rgba(0,0,0,.1)",
    marginTop: "15px",
  },

  detailsCard: {
    background: "#e8f5e9",
    padding: "20px",
    borderRadius: "10px",
    color: "#333",
    textAlign: "center",
    boxShadow: "0 2px 8px rgba(0,0,0,.1)",
    marginTop: "15px",
  },

  image: {
    width: "180px",
    marginTop: "15px",
  },
};