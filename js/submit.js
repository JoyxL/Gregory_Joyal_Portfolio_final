function geI(id) {
  return document.getElementById(id);
}

geI("contactSubmit").addEventListener("click", onSubmitPressed);
function onSubmitPressed() {
  var name = geI("nameField").value;
  var email = geI("emailField").value;
  var subject = geI("subjectField").value;
  var message = geI("messageField").value;
  if (name === "") {
    alert("Name is empty");
    return false;
  }

  // Validate Email (basic email format check)
  if (email === "") {
    alert("Email is empty");
    return false;
  }
  var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address");
    return false;
  }

  // Validate Subject
  if (subject === "") {
    alert("Subject is empty");
    return false;
  }

  // Validate Message
  if (message === "") {
    alert("Message is empty");
    return false;
  }

  if (message.length < 10) {
    alert("Message should be at least 10 characters long");
    return false;
  }
  fetch("includes/contact_form_submit.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(
      email
    )}&subject=${encodeURIComponent(subject)}&message=${encodeURIComponent(
      message
    )}`,
  })
    .then((response) => {
      if (response.ok) {
        alert("Form submitted successfully!");
        geI("nameField").value = "";
        geI("emailField").value = "";
        geI("subjectField").value = "";
        geI("messageField").value = "";
      } else {
        alert("There was an error submitting the form.");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred. Please try again later.");
    });
}
