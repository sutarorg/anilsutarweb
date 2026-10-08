(function () {
  'use strict';

  // Frontend-only password gate. This value is visible to site visitors
  // and is not suitable for protecting confidential content.
  var VALID_PASSWORD = 'oxford@123';
  var ACCESS_KEY = 'anilsutar.workAccess';
  var ACCESS_VALUE = 'granted';

  var form = document.getElementById('work-login');
  var passwordInput = document.getElementById('password');
  var feedback = document.getElementById('login-feedback');
  var submitButton = document.getElementById('login-submit');

  if (!form || !passwordInput || !feedback || !submitButton) return;

  try {
    if (window.sessionStorage.getItem(ACCESS_KEY) === ACCESS_VALUE) {
      window.location.replace('/work.php');
      return;
    }
  } catch (error) {
    // The form can still explain a storage failure if the visitor signs in.
  }

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    feedback.textContent = '';

    if (!form.reportValidity()) return;

    var password = passwordInput.value;
    if (password !== VALID_PASSWORD) {
      feedback.textContent = 'Incorrect password. Please try again.';
      passwordInput.value = '';
      passwordInput.focus();
      return;
    }

    try {
      window.sessionStorage.setItem(ACCESS_KEY, ACCESS_VALUE);
    } catch (error) {
      feedback.textContent = 'Your browser could not save access. Please allow session storage and try again.';
      return;
    }

    submitButton.disabled = true;
    submitButton.textContent = 'Submitting…';
    window.location.replace('/work.php');
  });
}());
