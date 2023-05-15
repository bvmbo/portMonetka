const password = document.querySelector("#password");
const email = document.querySelector("#email");
const clearBtn = document.querySelector(".clear");
const sendBtn = document.querySelector(".send");

const showError = (input, msg) => {
	const formBox = input.parentElement;
	const errorMsg = formBox.querySelector(".error-text");

	formBox.classList.add("error");
	errorMsg.textContent = msg;
};

const clearError = (input) => {
	const formBox = input.parentElement;
	formBox.classList.remove("error");
};

const checkForm = (input) => {
	input.forEach((el) => {
		if (el.value === "") {
			showError(el, el.placeholder);
		} else {
			clearError(el);
		}
	});
};

const checkLength = (input, min) => {
	if (input.value.length < min) {
		const inputName = input.previousElementSibling.innerText;
		showError(input, `Incerrect password`);
	}
};

const checkMail = (input) => {
	const re =
		/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (!re.test(input.value)) {
		showError(input, "Incorrect email.");
	} else {
		clearError(input);
	}
};

sendBtn.addEventListener("click", (e) => {
	e.preventDefault();

	checkForm([password, email]);
	checkLength(password, 8);
	checkMail(email);
});

clearBtn.addEventListener("click", (e) => {
	e.preventDefault();

	[password, email].forEach((el) => {
		el.value = "";

		clearError(el);
	});
});
