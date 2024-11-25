/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import SimpleMDE from 'simplemde';
import 'simplemde/dist/simplemde.min.css';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({
	mounted() {
		const descriptionElement = document.getElementById('description');
		if (descriptionElement) {
			new SimpleMDE({ 
				element: descriptionElement
			});
		}
	}
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const components = import.meta.glob('./components/*.vue');
for (const path in components) {
	const name = path.split('/').pop().split('.')[0];
	components[path]().then((module) => {
		app.component(name, module.default);
	});
}


/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
// SimpleMDE initialization moved to Vue app mounted hook
// This comment is no longer needed as the initialization is already in the mounted hook

app.mount('#app');