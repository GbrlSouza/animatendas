document.addEventListener('DOMContentLoaded', function () {
  // Exibe mensagem no console
  console.log("Anima Tendas - site carregado");

  // Exemplo: alerta de confirmação de envio de contato
  const contatoForm = document.querySelector('form');
  if (contatoForm && contatoForm.getAttribute('action') === '') {
    contatoForm.addEventListener('submit', function (e) {
      alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
    });
  }

  // Scroll suave para âncoras (caso use em futuras páginas)
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
});