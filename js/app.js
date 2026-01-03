function confirmDelete() {
  return confirm("Are you sure you want to delete this todo?");
}

function confirmLogout(){
    return confirm("Are you sure want to Logout?")
}

function validateTodo() {
  const title = document.querySelector('input[name="title"]');

  if (!title || title.value.trim() === "") {
    alert("Title cannot be empty!");
    title.focus();
    return false;
  }
  return true;
}

document.addEventListener("DOMContentLoaded", () => {
  const alerts = document.querySelectorAll(".alert, .auth-error");

  alerts.forEach(alert => {
    setTimeout(() => {
      alert.style.opacity = "0";
      setTimeout(() => alert.remove(), 500);
    }, 3000);
  });
});


document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("form[data-lock-submit]").forEach(form => {
    form.addEventListener("submit", () => {
      const btn = form.querySelector("button");
      if (btn) {
        btn.disabled = true;
        btn.textContent = "Processing...";
      }
    });
  });
});
