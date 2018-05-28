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
check['description'] = function(id) {
  var description = document.getElementById(id),
  tooltipStyle = getTooltip(description).style;
  if (descritpion.value.length >= 3) {
    description.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    descritpion.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

check['price'] = function(id) {
  var price = document.getElementById(id),
  tooltipStyle = getTooltip(price).style;
  if (price.value.length >= 1) {
    price.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    price.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

check['stock'] = function(id) {
  var stock = document.getElementById(id),
  tooltipStyle = getTooltip(stock).style;
  if (stock.value > '0') {
    stock.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    stock.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

check['size'] = function(id) {
  var size = document.getElementById(id),
  tooltipStyle = getTooltip(size).style;
  if (size.value.length >= 1) {
    size.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    size.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

check['color'] = function(id) {
  var color = document.getElementById(id),
  tooltipStyle = getTooltip(color).style;
  if (color.value.length >= 3) {
    color.className = 'correct';
    tooltipStyle.display = 'none';
    return true;
  } else {
    color.className = 'incorrect';
    tooltipStyle.display = 'inline-block';
    return false;
  }
};

(function() { // Utilisation d'une IIFE pour éviter les variables globales.
    var add = document.getElementById('add'),
    inputs = document.querySelectorAll('input[type=text]'),
    inputsLength = inputs.length;

    for (var i = 0; i < inputsLength; i++) {
      inputs[i].addEventListener('keyup', function(e) {
        check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
      });
    }

    add.addEventListener('add', function(e) {
      var result = true;
      for (var i in check) {
        result = check[i](i) && result;
      }

      if (result) {
        location.href="model/add_article.php?description="+description.value+"&name="+name.value+"&price="+price.value+"&stock="+stock.value+"&gender="+gender.value+"&diet="+diet.value+"&weight="+weight.value+"&size="+size.value+"&color="+color.value+"&age="+age.value;

      }
      e.preventDefault();
    });
});

deactivateTooltips();

