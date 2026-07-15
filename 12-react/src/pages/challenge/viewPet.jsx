import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";
import { getPet } from "./services/petService";
import { Link } from 'react-router-dom';
import {
  Avatar,
  Box,
  Card,
  CardContent,
  Chip,
  Container,
  Divider,
  Typography
} from "@mui/material";
import ArrowCircleLeftIcon from '@mui/icons-material/ArrowCircleLeft';

function ViewPet() {
  const { id } = useParams();

  const [pet, setPet] = useState(null);

  useEffect(() => {
    loadPet();
  }, []);
  const loadPet = async () => {
    try {
      const data = await getPet(id);
      setPet(data.pet);
    } catch (error) {
      console.error(error);
    }
  };

  if (!pet) {
    return (
      <Container sx={{ mt: 5 }}>
        <Typography>Cargando información...</Typography>
      </Container>
    );
  }

  return (
    <Container maxWidth="sm" sx={{ mt: 5 }}>
      <Card elevation={6} sx={{ borderRadius: 3 }}>
        <Link to="/challenge" style={{
          margin: 5,
        }} >
          <ArrowCircleLeftIcon />
        </Link>
        <Box
          sx={{
            display: "flex",
            justifyContent: "center",
            mt: 4,
          }}
        >
          <Avatar
            src={`http://localhost:8000/${pet.image}`}
            alt={pet.name}
            sx={{
              width: 180,
              height: 180,
              border: "5px solid",
              borderColor: "primary.main",
              boxShadow: 4,
            }}
          />
        </Box>

        <CardContent>
          <Typography variant="h4" fontWeight="bold" gutterBottom>
            {pet.name}
          </Typography>

          <Chip
            label={pet.status ? "Activo" : "Inactivo"}
            color={pet.status ? "success" : "error"}
            sx={{ mb: 2 }}
          />

          <Divider sx={{ mb: 2 }} />

          <Box sx={{ display: "flex", justifyContent: "space-between", mb: 1 }}>
            <Typography fontWeight="bold">Especie:</Typography>
            <Typography>{pet.kind}</Typography>
          </Box>

          <Box sx={{ display: "flex", justifyContent: "space-between", mb: 1 }}>
            <Typography fontWeight="bold">Raza:</Typography>
            <Typography>{pet.breed}</Typography>
          </Box>

          <Box sx={{ display: "flex", justifyContent: "space-between", mb: 1 }}>
            <Typography fontWeight="bold">Edad:</Typography>
            <Typography>{pet.age} años</Typography>
          </Box>

          <Box sx={{ display: "flex", justifyContent: "space-between", mb: 1 }}>
            <Typography fontWeight="bold">Peso:</Typography>
            <Typography>{pet.weight} kg</Typography>
          </Box>

          <Box sx={{ display: "flex", justifyContent: "space-between", mb: 2 }}>
            <Typography fontWeight="bold">Ciudad:</Typography>
            <Typography>{pet.location}</Typography>
          </Box>

          <Typography variant="h6" gutterBottom>
            Descripción
          </Typography>

          <Typography color="text.secondary">{pet.description}</Typography>

          <Divider sx={{ my: 2 }} />

          <Typography variant="body2" color="text.secondary">
            Registrado: {new Date(pet.created_at).toLocaleDateString()}
          </Typography>

          <Typography variant="body2" color="text.secondary">
            Última actualización:{" "}
            {new Date(pet.updated_at).toLocaleDateString()}
          </Typography>
        </CardContent>
      </Card>
    </Container>
  );
}

export default ViewPet;
