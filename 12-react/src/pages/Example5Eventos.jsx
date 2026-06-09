import { useState } from "react";
import { BtnBack } from "../components/BtnBack";
function Example5Events() {
  const [chosenPokemon, setChosenPokemon] = useState(null);
  const [hoveredPokemon, setHoveredPokemon] = useState(null);
  const [inputRange, setInputRange] = useState(50);

  const handleChoice = (name) => {
    setChosenPokemon(name);
  };
  const handleMouseEnter = (name) => {
    setHoveredPokemon(name);
  };
  const handleMouseLeave = () => {
    setHoveredPokemon(null);
  };
  const handleInput = (e) => {
    setInputRange(e.target.value);
  };
  const eventContainer = {
    marginTop: "2rem",
    padding: "2rem",
    backgroundColor: "#fff",
    borderRadius: "16px",
    boxShadow: "0 4px 12px rgba(0,0,0,0.1)",
  };

  const titleH3 = {
    marginTop: "1.5rem",
    marginBottom: "1rem",
    color: "#2563eb",
  };

  const btnClick = {
    display: "flex",
    gap: "1rem",
    flexWrap: "wrap",
    justifyContent: "center",
  };

  const buttonStyle = {
    display: "flex",
    flexDirection: "column",
    alignItems: "center",
    gap: "0.5rem",
    padding: "1rem",
    minWidth: "140px",
    border: "none",
    borderRadius: "12px",
    backgroundColor: "#3b82f6",
    color: "white",
    cursor: "pointer",
  };

  const chosePokemon = {
    marginTop: "1rem",
    padding: "1rem",
    backgroundColor: "#f3f4f6",
    borderRadius: "10px",
    textAlign: "center",
    fontWeight: "bold",
  };

  const hoverStyle = {
    display: "flex",
    flexDirection: "column",
    alignItems: "center",
    gap: "0.5rem",
    padding: "1rem",
    minWidth: "180px",
    backgroundColor: "#f59e0b",
    color: "white",
    border: "none",
    borderRadius: "12px",
    cursor: "pointer",
  };

  const rangeStyle = {
    width: "100%",
    marginTop: "1rem",
  };

  const outInput = {
    marginTop: "1rem",
    textAlign: "center",
    fontSize: "2rem",
    fontWeight: "bold",
    color: "#dc2626",
  };
  return (
    <div className="container">
      <BtnBack />
      <h2> Example 5: Event Handling</h2>
      <p>Respond to user interaction (click, hover, input, submit)</p>
      <div style={eventContainer}>
        <h3 style={titleH3}>Click Event</h3>
        <div style={btnClick}>
          <button
            onClick={(e) => handleChoice("Bulbasaur")}
            style={buttonStyle}
          >
            <span style={{ zoom: 2.4 }}>☘️</span> Bullbasaur
          </button>
          <button
            onClick={(e) => handleChoice("Charmander")}
            style={buttonStyle}
          >
            <span style={{ zoom: 2.4 }}>🔥</span> Charamandar
          </button>
          <button onClick={(e) => handleChoice("Squirtle")} style={buttonStyle}>
            <span style={{ zoom: 2.4 }}>💧</span> Squirtle
          </button>
        </div>
        {chosenPokemon ? (
          <div style={chosePokemon}> You choose {chosenPokemon} </div>
        ) : (
          <div style={chosePokemon}> Please choose a pokemon! </div>
        )}

        <h3 style={titleH3}>MouseEnter/MouseLeave Event:</h3>
        <div style={btnClick}>
          <button
            onMouseEnter={() => handleMouseEnter("Pikachu")}
            onMouseLeave={handleMouseLeave}
            style={hoverStyle}
          >
            Hover here!
            <img
              src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png"
              alt="Pikachu"
              style={{ zoom: 0.4 }}
            />
          </button>
          <button
            onMouseEnter={() => handleMouseEnter("Evee")}
            onMouseLeave={handleMouseLeave}
            style={hoverStyle}
          >
            Hover here too!
            <img
              src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/133.png"
              alt="Eevee"
              style={{ zoom: 0.4 }}
            />
          </button>
        </div>
        {hoveredPokemon && (
          <div style={chosePokemon}> You are viewing {hoveredPokemon} </div>
        )}

        <h3 style={titleH3}> Input event:</h3>
        <input
          type="range"
          min={0}
          max={100}
          style={rangeStyle}
          onInput={handleInput}
        />
        <span style={{ display: "block", textAlign: "center" }}>Power:</span>
        {inputRange && <div style={outInput}> {inputRange} </div>}
      </div>
    </div>
  );
}
export default Example5Events;
