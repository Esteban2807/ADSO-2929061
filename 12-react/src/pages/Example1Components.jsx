import { BtnBack } from "../components/BtnBack";
import "./Example1.css";

function Charmander() {
  return (
    <div className="pokemon-card fire">
      <h2>Charmander</h2>
      <p>Type: Fire</p>
      <p>Ability: Blaze</p>
    </div>
  );
}

function Squirtle() {
  return (
    <div className="pokemon-card water">
      <h2>Squirtle</h2>
      <p>Type: Water</p>
      <p>Ability: Torrent</p>
    </div>
  );
}

function Example1Components() {
  return (
    <div className="container">
      <BtnBack />

      <h1>Example 1: Components</h1>
      <p>Create independent and reusable UI pieces</p>

      <div className="pokemon-grid">
        <Charmander />
        <Squirtle />
      </div>
    </div>
  );
}

export default Example1Components;
