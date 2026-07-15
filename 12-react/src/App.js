import { BrowserRouter, Routes, Route } from "react-router-dom";
import { SnackbarProvider } from "notistack";
import "./App.css";

import Menu from "./components/Menu";
import Example1Components from "./pages/Example1Components";
import Example2JSX from "./pages/Example2JSX";
import Example3Props from "./pages/Example3Props";
import Example4StateHooks from "./pages/Example4StateHooks";
import Example5Eventos from "./pages/Example5Eventos";
import Example6CondicionalListas from "./pages/Example6CondicionalListas";
import Example7Routing from "./pages/Example7Routing";
import Example8DataFetching from "./pages/Example8DataFetching";
import Pets from "./pages/challenge/page";
import Login from "./pages/challenge/login";
import ViewPet from "./pages/challenge/viewPet";
import EditPet from "./pages/challenge/editPet";
import CreatePet from "./pages/challenge/createPet";

function App() {
  return (
    <SnackbarProvider
      maxSnack={3}
      autoHideDuration={3000}
      preventDuplicate
      anchorOrigin={{
        vertical: "top",
        horizontal: "right",
      }}
    >
      <BrowserRouter>
        <div className="App">
          <Routes>
            <Route path="/" element={<Menu />} />
            <Route path="/example1" element={<Example1Components />} />
            <Route path="/example2" element={<Example2JSX />} />
            <Route path="/example3" element={<Example3Props />} />
            <Route path="/example4" element={<Example4StateHooks />} />
            <Route path="/example5" element={<Example5Eventos />} />
            <Route path="/example6" element={<Example6CondicionalListas />} />
            <Route path="/example7/*" element={<Example7Routing />} />
            <Route path="/example8" element={<Example8DataFetching />} />
            <Route path="/challenge" element={<Pets />} />
            <Route path="/challenge/login" element={<Login />} />
            <Route path="/challenge/viewPet/:id" element={<ViewPet />} />
            <Route path="/challenge/editPet/:id" element={<EditPet />} />
            <Route path="/challenge/createPet" element={<CreatePet />} />
          </Routes>
        </div>
      </BrowserRouter>
    </SnackbarProvider>
  );
}

export default App;
