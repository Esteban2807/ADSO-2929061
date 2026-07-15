import { useEffect, useState } from "react";
import { getPets } from "./services/petService";
import Logout from "./logout";
import {
  Box,
  Chip,
  Container,
  Paper,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TableRow,
  Typography,
  IconButton,
} from "@mui/material";
import { useNavigate, Link } from "react-router-dom";
import Swal from "sweetalert2";
import { DeleteOutlined } from "@mui/icons-material";
import { deletePet } from "./services/petService";

import {
  AddCircleOutlined,
  EditOutlined,
  VisibilityOutlined,
} from "@mui/icons-material";
import { useAlert } from "../../hooks/useAlert";
function Pets() {
  const navigate = useNavigate();
  const [petsList, setPetsList] = useState();
  const { success, error } = useAlert();

  const handleDelete = async (id) => {
    const result = await Swal.fire({
      title: "¿Eliminar mascota?",
      text: "Esta acción no se puede deshacer.",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Eliminar",
      cancelButtonText: "Cancelar",
    });

    if (!result.isConfirmed) return;

    try {
      await deletePet(id);

      success("Mascota eliminada correctamente");

      setPetsList((prev) => prev.filter((pet) => pet.id !== id));
    } catch (err) {
      error("No fue posible eliminar la mascota");
    }
  };
  useEffect(() => {
    loadPets();
  }, []);

  const loadPets = async () => {
    try {
      const response = await getPets();
      setPetsList(response.pets);
    } catch (error) {
      console.error(error);
    }
  };
  return (
    <>
      <Logout />
      <Container maxWidth="xl" sx={{ mt: 4 }}>
        <Box
          sx={{
            display: "flex",
            flexDirection: "row",
            justifyContent: "space-between",
          }}
        >
          <Typography
            variant="h4"
            fontWeight="bold"
            mb={3}
            textAlign="center"
            color="primary"
          >
            🐶 Listado de Mascotas
          </Typography>
          <Link to="/challenge/createPet">
            <AddCircleOutlined
              fontSize="large"
              sx={{
                color: "#fff",
              }}
            />
          </Link>
        </Box>

        <TableContainer
          component={Paper}
          elevation={6}
          sx={{
            borderRadius: 3,
            overflow: "hidden",
          }}
        >
          <Table>
            <TableHead>
              <TableRow
                sx={{
                  backgroundColor: "#1976d2",
                }}
              >
                {[
                  "Imagen",
                  "Nombre",
                  "Especie",
                  "Peso",
                  "Edad",
                  "Raza",
                  "Ciudad",
                  "Descripción",
                  "Estado",
                  "Creado",
                  "Actualizado",
                  "Acciones",
                ].map((title) => (
                  <TableCell
                    key={title}
                    align="center"
                    sx={{
                      color: "white",
                      fontWeight: "bold",
                      fontSize: 15,
                    }}
                  >
                    {title}
                  </TableCell>
                ))}
              </TableRow>
            </TableHead>

            <TableBody>
              {petsList?.map((pet) => (
                <TableRow
                  key={pet.id}
                  hover
                  sx={{
                    transition: ".2s",
                    "&:hover": {
                      backgroundColor: "#f4f8fc",
                    },
                  }}
                >
                  <TableCell align="center">
                    <Box
                      component="img"
                      src={`http://localhost:8000/${pet.image}`}
                      alt={pet.name}
                      sx={{
                        width: 70,
                        height: 70,
                        borderRadius: "50%",
                        objectFit: "cover",
                        border: "3px solid #1976d2",
                      }}
                    />
                  </TableCell>

                  <TableCell align="center" sx={{ fontWeight: "bold" }}>
                    {pet.name}
                  </TableCell>

                  <TableCell align="center">{pet.kind}</TableCell>

                  <TableCell align="center">{pet.weight} kg</TableCell>

                  <TableCell align="center">{pet.age} años</TableCell>

                  <TableCell align="center">{pet.breed}</TableCell>

                  <TableCell align="center">{pet.location}</TableCell>

                  <TableCell
                    sx={{
                      maxWidth: 250,
                      whiteSpace: "nowrap",
                      overflow: "hidden",
                      textOverflow: "ellipsis",
                    }}
                  >
                    {pet.description}
                  </TableCell>

                  <TableCell align="center">
                    <Chip
                      label={pet.status ? "Activo" : "Inactivo"}
                      color={pet.status ? "success" : "error"}
                      size="small"
                    />
                  </TableCell>

                  <TableCell align="center">
                    {new Date(pet.created_at).toLocaleDateString()}
                  </TableCell>

                  <TableCell align="center">
                    {new Date(pet.updated_at).toLocaleDateString()}
                  </TableCell>

                  <TableCell align="center">
                    <IconButton
                      variant="contained"
                      color="primary"
                      size="small"
                      onClick={() => navigate(`/challenge/viewPet/${pet.id}`)}
                    >
                      <VisibilityOutlined />
                    </IconButton>
                    <IconButton
                      variant="contained"
                      color="primary"
                      size="small"
                      onClick={() => navigate(`/challenge/editPet/${pet.id}`)}
                    >
                      <EditOutlined />
                    </IconButton>
                    <IconButton
                      color="error"
                      size="small"
                      onClick={() => handleDelete(pet.id)}
                    >
                      <DeleteOutlined />
                    </IconButton>
                  </TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </TableContainer>
      </Container>
    </>
  );
}

export default Pets;
