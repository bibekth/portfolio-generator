/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

// import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';


import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './components/App';

const container = document.getElementById('edit-website-container');
const root = createRoot(container);
root.render(<App />);

// import './components/Example';

// import React from 'react';
// import ReactDOM from 'react-dom';
// import App from './components/App';

// ReactDOM.render(<App />, document.getElementById('create-website-app-react'));
