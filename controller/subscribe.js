function deactivateTooltips() {
    var spans = document.getElementsByTagName('span'),
    spansLength = spans.length;
    for (var i = 0 ; i < spansLength ; i++) {
        if (spans[i].className == 'tooltip') {
            spans[i].style.display = 'none';
        }
    }
}

function deactivateTooltips() {
  var tooltips = document.querySelectorAll('.tooltip'),
  tooltipsLength = tooltips.length;
  for (var i = 0; i < tooltipsLength; i++) {
    tooltips[i].style.display = 'none';
  }
}

function getTooltip(elements) {
  while (elements = elements.nextSibling) {
    if (elements.className === 'tooltip') {
      return elements;
    }
  }
  return false;
}

var check = {};
check['pseudo'] = function(id) {
  var pseudo = document.getElementById(id),
  tooltipStyle = getTooltip(pseudo).style;
  if (pseudo.value.length >= 3) {
    pseudo.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    pseudo.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};
check['firstname'] = function(id) {
  var firstname = document.getElementById(id),
  tooltipStyle = getTooltip(firstname).style;
  if (firstname.value.length >= 2) {
    firstname.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    firstname.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};
check['lastname'] = function(id) {
  var lastname = document.getElementById(id),
  tooltipStyle = getTooltip(lastname).style;
  if (lastname.value.length >= 2) {
    lastname.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    lastname.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};


check['password1'] = function() {
  var password1 = document.getElementById('password1'),
  tooltipStyle = getTooltip(password1).style;
  if (password1.value.length >= 3) {
    password1.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    password1.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

check['password2'] = function() {
  var password1 = document.getElementById('password1'),
  password2 = document.getElementById('password2'),
  tooltipStyle = getTooltip(password2).style;
  if (password1.value == password2.value && password2.value != '' && password2.value.length >= 3) {
    password2.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    password2.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

(function() { // Utilisation d'une IIFE pour éviter les variables globales.
    var subscribe = document.getElementById('subscribe'),
    inputs = document.querySelectorAll('input[type=text], input[type=password]'),
    inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
      inputs[i].addEventListener('keyup', function(e) {
        check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
      });
    }

    subscribe.addEventListener('submit', function(e) {
      var result = true;
      for (var i in check) {
        result = check[i](i) && result;
      }

      if (result) {
        location.href="subscribe.php?pseudo="+pseudo.value+"&firstname="+firstname.value+"&name="+lastname.value+"&password1="+password1.value+"&password2="+password2.value;

      }
      e.preventDefault();
    });
  subscribe.addEventListener('reset', function() {
    for (var i = 0; i < inputsLength; i++) {
      inputs[i].className = '';
    }
    deactivateTooltips();
  });
})();

deactivateTooltips();
