import api from "./api";

export const login = async (credentials) => {
  const response = await api.post("/login", credentials);

  const token = response.data.token;
  const user = response.data.user;

  localStorage.setItem("token", token);
  localStorage.setItem("user", JSON.stringify(user));
  console.log(response.data);
  return response;
};

export const logout = async () => {
  await api.post("/logout");

  localStorage.removeItem("token");
  localStorage.removeItem("user");
};
