(function () {
  'use strict';

  // Frontend-only sign-in by request. These values are visible to site visitors
  // and are not suitable for protecting confidential content.
  var VALID_EMAIL = 'anilrsutar@gmail.com';
  var VALID_PASSWORD = 'oxford@123';
  var ACCESS_KEY = 'anilsutar.workAccess';
  var ACCESS_VALUE = 'granted';

  var form = document.getElementById('work-login');
  var emailInput = document.getElementById('email');
  var passwordInput = document.getElementById('password');
  var feedback = document.getElementById('login-feedback');
  var submitButton = document.getElementById('login-submit');

  if (!form || !emailInput || !passwordInput || !feedback || !submitButton) return;

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

    var email = emailInput.value.trim().toLowerCase();
    var password = passwordInput.value;
    if (email !== VALID_EMAIL || password !== VALID_PASSWORD) {
      feedback.textContent = 'Those details do not match. Please check your email and password.';
      passwordInput.value = '';
      passwordInput.focus();
      return;
    }

    try {
      window.sessionStorage.setItem(ACCESS_KEY, ACCESS_VALUE);
    } catch (error) {
      feedback.textContent = 'Your browser could not save this sign-in. Please allow session storage and try again.';
      return;
    }

    submitButton.disabled = true;
    submitButton.textContent = 'Signing you in…';
    window.location.replace('/work.php');
  });
}());
