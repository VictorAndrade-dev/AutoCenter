// Senha de desenvolvedor (deve ser alterada em produção)
const DEV_PASSWORD = "1234";

function checkPassword() {
  const passwordInput = document.getElementById('dev-password');
  const errorMessage = document.getElementById('password-error');
  
  if (passwordInput.value === DEV_PASSWORD) {
    document.getElementById('password-prompt').style.display = 'none';
    document.getElementById('maintenance-content').style.display = 'block';
    loadUsers();
    loadServices();
  } else {
    errorMessage.style.display = 'block';
    passwordInput.value = '';
    setTimeout(() => {
      errorMessage.style.display = 'none';
    }, 3000);
  }
}

// Funções para gerenciar usuários
function loadUsers() {
  // Simulação de carregamento de usuários
  const users = [
    { id: 1, name: "Tony Neto", email: "tony@autocenter.com", type: "admin" },
    { id: 2, name: "José Elias", email: "jose@autocenter.com", type: "admin" },
    { id: 3, name: "Cliente Exemplo", email: "cliente@exemplo.com", type: "client" }
  ];
  
  const tableBody = document.querySelector('#users-table tbody');
  tableBody.innerHTML = '';
  
  users.forEach(user => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${user.id}</td>
      <td>${user.name}</td>
      <td>${user.email}</td>
      <td>
        <button class="btn btn-sm btn-primary" onclick="editUser(${user.id})">Editar</button>
        <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.id})">Excluir</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
}

function showAddUserModal() {
  // Limpar formulário
  document.getElementById('user-form').reset();
  $('#addUserModal').modal('show');
}

function saveUser() {
  // Simulação de salvamento de usuário
  alert('Usuário salvo com sucesso!');
  $('#addUserModal').modal('hide');
  loadUsers();
}

function editUser(id) {
  // Simulação de edição de usuário
  alert(`Editando usuário com ID ${id}`);
}

function deleteUser(id) {
  if (confirm(`Tem certeza que deseja excluir o usuário com ID ${id}?`)) {
    // Simulação de exclusão de usuário
    alert(`Usuário com ID ${id} excluído!`);
    loadUsers();
  }
}

// Funções para gerenciar serviços
function loadServices() {
  // Simulação de carregamento de serviços
  const services = [
    { id: 1, name: "Troca de Óleo", price: 120.00, duration: 30 },
    { id: 2, name: "Alinhamento", price: 80.00, duration: 45 },
    { id: 3, name: "Balanceamento", price: 60.00, duration: 30 }
  ];
  
  const tableBody = document.querySelector('#services-table tbody');
  tableBody.innerHTML = '';
  
  services.forEach(service => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${service.id}</td>
      <td>${service.name}</td>
      <td>R$ ${service.price.toFixed(2)}</td>
      <td>
        <button class="btn btn-sm btn-primary" onclick="editService(${service.id})">Editar</button>
        <button class="btn btn-sm btn-danger" onclick="deleteService(${service.id})">Excluir</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
}

function showAddServiceModal() {
  // Limpar formulário
  document.getElementById('service-form').reset();
  $('#addServiceModal').modal('show');
}

function saveService() {
  // Simulação de salvamento de serviço
  alert('Serviço salvo com sucesso!');
  $('#addServiceModal').modal('hide');
  loadServices();
}

function editService(id) {
  // Simulação de edição de serviço
  alert(`Editando serviço com ID ${id}`);
}

function deleteService(id) {
  if (confirm(`Tem certeza que deseja excluir o serviço com ID ${id}?`)) {
    // Simulação de exclusão de serviço
    alert(`Serviço com ID ${id} excluído!`);
    loadServices();
  }
}

// Funções para backup
function createBackup() {
  document.getElementById('backup-status').innerHTML = `
    <div class="alert alert-success">Backup criado com sucesso em ${new Date().toLocaleString()}</div>
  `;
}

function restoreBackup() {
  if (confirm('Tem certeza que deseja restaurar o último backup? Todos os dados atuais serão substituídos.')) {
    document.getElementById('backup-status').innerHTML = `
      <div class="alert alert-info">Backup restaurado com sucesso</div>
    `;
  }
}
