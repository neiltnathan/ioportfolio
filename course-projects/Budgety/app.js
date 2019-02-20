//BUDGET CONTROLLER
let budgetController = (function() {
  let Expense = function(id, description, value) {
    this.id = id;
    this.description = description;
    this.value = value;
    this.percentage = -1;
  };

  Expense.prototype.calcPercentage = function(totalIncome) {
    if (totalIncome > 0) {
      this.percentage = Math.round((this.value / totalIncome) * 100);
    } else {
      this.percentage = -1;
    }
  };

  Expense.prototype.getPercentage = function() {
    return this.percentage;
  };

  let Income = function(id, description, value) {
    this.id = id;
    this.description = description;
    this.value = value;
  };

  let calculateTotal = function(type) {
    let sum = 0;
    data.allItems[type].forEach(function(cur) {
      sum = sum + cur.value;
    });
    data.totals[type] = sum;
  };

  let data = {
    allItems: {
      exp: [],
      inc: []
    },
    totals: {
      exp: 0,
      inc: 0
    },
    budget: 0,
    percentage: -1
  };

  return {
    addItem: function(type, des, val) {
      let newItem, ID;
      //create new id
      if (data.allItems[type].length > 0) {
        ID = data.allItems[type][data.allItems[type].length - 1].id + 1;
      } else {
        ID = 0;
      }

      //create new item based on 'inc' or 'exp'

      if (type === "exp") {
        newItem = new Expense(ID, des, val);
      } else if ((type = "inc")) {
        newItem = new Income(ID, des, val);
      }

      //push it into data structure
      data.allItems[type].push(newItem);

      //return the new element
      return newItem;
    },

    deleteItem: function(type, id) {
      let ids, index;

      ids = data.allItems[type].map(function(current) {
        return current.id;
      });

      index = ids.indexOf(id);

      if (index !== -1) {
        data.allItems[type].splice(index, 1);
      }
    },

    calculateBudget: function() {
      //calculate total income and expenses
      calculateTotal("exp");
      calculateTotal("inc");

      //calculate the budget: income -budget
      data.budget = data.totals.inc - data.totals.exp;

      //calculate the percentage of income that we spent
      if (data.totals.inc > 0) {
        data.percentage = Math.round((data.totals.exp / data.totals.inc) * 100);
      } else {
        data.percentage = -1;
      }
    },

    calculatePercentages: function() {
      data.allItems.exp.forEach(function(cur) {
        cur.calcPercentage(data.totals.inc);
      });
    },

    getPercentages: function() {
      let allPerc = data.allItems.exp.map(function(cur) {
        return cur.getPercentage();
      });
      return allPerc;
    },

    getBudget: function() {
      return {
        budget: data.budget,
        totalInc: data.totals.inc,
        totalExp: data.totals.exp,
        percentage: data.percentage
      };
    },

    testing: function() {
      console.log(data);
    }
  };
})();

//UICONTROLLER
let UIController = (function() {
  let DOMstrings = {
    inputType: ".add__type",
    inputDescription: ".add__description",
    inputValue: ".add__value",
    inputBtn: ".add__btn",
    incomeContainer: ".income__list",
    expensesContainer: ".expenses__list",
    budgetLabel: ".budget__value",
    incomeLabel: ".budget__income--value",
    expensesLabel: ".budget__expenses--value",
    percentageLabel: ".budget__expenses--percentage",
    container: ".container",
    expensesPercLabel: ".item__percentage",
    dateLabel: ".budget__title--month"
  };

  let formatNumber = function(num, type) {
    let numSplit, int, dec;
    num = Math.abs(num);
    num = num.toFixed(2);

    numSplit = num.split(".");
    //console.log(numSplit);
    int = numSplit[0];
    if (int.length > 3) {
      int = int.substr(0, int.length - 3) + "," + int.substr(int.length - 3, 3);
    }

    dec = numSplit[1];

    return (type === "exp" ? "-" : "+") + " " + int + "." + dec;
  };

  let nodeListForEach = function(list, callback) {
    for (let i = 0; i < list.length; i++) {
      callback(list[i], i);
    }
  };

  return {
    getInput: function() {
      return {
        type: document.querySelector(DOMstrings.inputType).value,
        description: document.querySelector(DOMstrings.inputDescription).value,
        value: parseFloat(document.querySelector(DOMstrings.inputValue).value)
      };
    },
    addListItem: function(obj, type) {
      let html, newHtml, element;
      //Create HTML strings with placeholder text

      if (type === "inc") {
        element = DOMstrings.incomeContainer;
        html =
          '<div class="item clearfix" id="income-%id%"><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button></div></div></div>';
      } else if (type === "exp") {
        element = DOMstrings.expensesContainer;
        html =
          '<div class="item clearfix" id="expense-%id%"><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__percentage">21%</div><div class="item__delete"><button class="item__delete--btn"><i class="ion-ios-close-outline"></i></button></div></div></div>';
      }

      //Relace placeholder text with some actual data

      newHtml = html.replace("%id%", obj.id);
      newHtml = newHtml.replace("%description%", obj.description);
      newHtml = newHtml.replace("%value%", formatNumber(obj.value, type));

      //Insert the HTML into DOM

      document.querySelector(element).insertAdjacentHTML("beforeend", newHtml);
    },

    deleteListItem: function(selectorID) {
      let el = document.getElementById(selectorID);
      el.parentNode.removeChild(el);
    },

    clearFields: function() {
      let fields, fieldsArray;

      fields = document.querySelectorAll(
        DOMstrings.inputDescription + "," + DOMstrings.inputValue
      );

      fieldsArray = Array.prototype.slice.call(fields);
      fieldsArray.forEach(function(current, index, array) {
        current.value = "";
      });

      fieldsArray[0].focus();
    },

    displayBudget: function(obj) {
      let type;
      obj.budget > 0 ? (type = "inc") : (type = "exp");
      document.querySelector(DOMstrings.budgetLabel).textContent = formatNumber(
        obj.budget,
        type
      );
      document.querySelector(DOMstrings.incomeLabel).textContent = formatNumber(
        obj.totalInc,
        "inc"
      );
      document.querySelector(
        DOMstrings.expensesLabel
      ).textContent = formatNumber(obj.totalExp, "exp");

      if (obj.percentage > 0) {
        document.querySelector(DOMstrings.percentageLabel).textContent =
          obj.percentage;
      } else {
        document.querySelector(DOMstrings.percentageLabel).textContent = "---";
      }
    },

    displayPercentages: function(percentage) {
      let fields = document.querySelectorAll(DOMstrings.expensesPercLabel);

      //callback function
      nodeListForEach(fields, function(current, index) {
        if (percentage[index] > 0) {
          current.textContent = percentage[index] + "%";
        } else {
          current.textContent = "---";
        }
      });
    },

    displayMonth: function() {
      let year, month, months, now;
      now = new Date();
      months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ];
      month = now.getMonth();
      year = now.getFullYear();
      document.querySelector(DOMstrings.dateLabel).textContent =
        months[month] + " " + year;
    },

    changedType: function() {
      let fields = document.querySelectorAll(
        DOMstrings.inputType +
          "," +
          DOMstrings.inputDescription +
          "," +
          DOMstrings.inputValue
      );
      nodeListForEach(fields, function(cur) {
        cur.classList.toggle("red-focus");
      });
      document.querySelector(DOMstrings.inputBtn).classList.toggle("red");
    },

    //make private DOMstrings  publically available
    getDOMstrings: function() {
      return DOMstrings;
    }
  };
})();

//GLOBAL APP CONTROLLER
let controller = (function(budgetCtrl, UICtrl) {
  let setupEventListeners = function() {
    let DOM = UICtrl.getDOMstrings();

    document.querySelector(DOM.inputBtn).addEventListener("click", ctrlAddItem);

    document.addEventListener("keypress", function(event) {
      if (event.keycode === 13 || event.which === 13) {
        ctrlAddItem();
      }
    });

    document
      .querySelector(DOM.container)
      .addEventListener("click", ctrlDeleteItem);

    document
      .querySelector(DOM.inputType)
      .addEventListener("change", UICtrl.changedType);
  };

  let updateBudget = function() {
    //1. Calculate budget
    budgetCtrl.calculateBudget();

    //2. Return budget
    let budget = budgetCtrl.getBudget();

    //3.display budget on the UI
    UICtrl.displayBudget(budget);
  };

  updatePercentages = function() {
    //1. calculate percentages
    budgetCtrl.calculatePercentages();
    //2. Read percentages from budget controller
    let percentages = budgetCtrl.getPercentages();
    //3. update the UI with the new percentages
    UICtrl.displayPercentages(percentages);
  };

  let ctrlAddItem = function() {
    let input, newItem;
    //1. get field input data
    input = UICtrl.getInput();

    if (input.description !== "" && !isNaN(input.value) && input.value > 0) {
      //2. Add the item to the budget controller
      newItem = budgetCtrl.addItem(input.type, input.description, input.value);

      //3. Add the item to the UI
      UICtrl.addListItem(newItem, input.type);

      //4.  clear fields
      UICtrl.clearFields();

      //5. Calculate and update budget
      updateBudget();

      //6. Calculate and update percentages
      updatePercentages();
    }
  };

  let ctrlDeleteItem = function(event) {
    let itemID, splitID, type, ID;
    itemID = event.target.parentNode.parentNode.parentNode.parentNode.id;

    if (itemID) {
      splitID = itemID.split("-");
      type = splitID[0].slice(0, 3);
      //console.log(type);
      ID = parseInt(splitID[1]);

      //1.  Delete item from data structure

      budgetCtrl.deleteItem(type, ID);

      //2. Delete the item from the UI

      UICtrl.deleteListItem(itemID);

      //3. Update and show the new budget

      updateBudget();

      //4. Calculate and update percentages
      updatePercentages();
    }
  };

  return {
    init: function() {
      console.log("Application has started");
      UICtrl.displayMonth();
      UICtrl.displayBudget({
        budget: 0,
        totalInc: 0,
        totalExp: 0,
        percentage: -1
      });
      setupEventListeners();
    }
  };
})(budgetController, UIController);

controller.init();
