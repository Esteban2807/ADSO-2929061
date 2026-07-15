import { useState, useEffect, useRef, useCallback } from "react";
import { BtnBack } from "../components/BtnBack";

const pokemonList = [
  {
    name: "Pikachu",
    img: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png",
  },
  {
    name: "Charmander",
    img: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png",
  },
  {
    name: "Squirtle",
    img: "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png",
  },
];

function Example4StateHooks() {
  const [caughtPokemon, setCaughtPokemon] = useState(null);
  const [loading, setLoading] = useState(false);
  const [catchCounter, setCatchCounter] = useState(0);
  const [history, setHistory] = useState([]);

  const hasMounted = useRef(false);

  const catchPokemon = useCallback(() => {
    setLoading(true);

    setTimeout(() => {
      const randomIndex = Math.floor(Math.random() * pokemonList.length);
      const newPokemon = pokemonList[randomIndex];

      setCaughtPokemon(newPokemon);
      setCatchCounter((prev) => prev + 1);
      setHistory((prev) => [newPokemon, ...prev]);
      setLoading(false);
    }, 1000);
  }, []);
  useEffect(() => {
    if (!hasMounted.current) {
      catchPokemon();
      hasMounted.current = true;
    }
  }, [catchPokemon]);
  const styles = {
    section: {
      marginTop: "2rem",
      padding: "2rem",
      backgroundColor: "#fff",
      borderRadius: "16px",
      boxShadow: "0 4px 12px rgba(0,0,0,0.1)",
      textAlign: "center",
    },

    button: {
      backgroundColor: "#ef4444",
      color: "white",
      border: "none",
      borderRadius: "8px",
      padding: "0.8rem 1.5rem",
      fontSize: "1rem",
      cursor: "pointer",
      marginBottom: "1.5rem",
    },

    pokemonCard: {
      marginTop: "1rem",
    },

    pokemonImg: {
      width: "150px",
      height: "150px",
      imageRendering: "pixelated",
    },

    recently: {
      display: "flex",
      flexWrap: "wrap",
      gap: "1rem",
      marginTop: "1rem",
      justifyContent: "center",
    },

    history: {
      display: "flex",
      flexDirection: "column",
      alignItems: "center",
      padding: "0.75rem",
      backgroundColor: "#f3f4f6",
      borderRadius: "12px",
      minWidth: "100px",
    },

    img: {
      width: "60px",
      height: "60px",
      imageRendering: "pixelated",
    },

    span: {
      marginTop: "0.5rem",
      fontSize: "0.9rem",
      fontWeight: "bold",
    },
  };

  return (
    <div className="container">
      <BtnBack />
      <h2>Example 4: State and Hooks</h2>
      <h3>(useState,useEffect)</h3>
      <p>Manage dynamic data and side effects</p>

      <div style={styles.section}>
        <button onClick={catchPokemon} disabled={loading} style={styles.button}>
          {loading ? "Catching..." : "Try again"}
        </button>
        {loading ? (
          <h3>Searching for a wild Pokémon...</h3>
        ) : (
          <div>
            {caughtPokemon && (
              <>
                <h3>You caught a {caughtPokemon.name}</h3>
              </>
            )}
          </div>
        )}
        <div style={{ marginTop: "2rem" }}>
          <p>
            <strong>Total caught:</strong> {catchCounter}
          </p>

          {history.length > 0 && (
            <div>
              <p>
                <strong>Recently caught:</strong>
              </p>
              <div style={styles.recently}>
                {history.map((poke, index) => (
                  <div key={index} style={styles.history}>
                    <img src={poke.img} alt={poke.name} style={styles.img} />
                    <span style={styles.span}>{poke.name}</span>
                  </div>
                ))}
              </div>
            </div>
          )}
        </div>
      </div>
    </div>
  );
}
export default Example4StateHooks;
