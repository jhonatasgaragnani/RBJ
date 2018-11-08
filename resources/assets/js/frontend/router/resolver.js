export const view = (view, file) => {
    try {
        return resolve => require([`../views/${view}/${file ? file : 'index.vue'}`], resolve)
    } catch (e) {
        console.log(e)
    }
};

export const component = (component, file) => {
    try {
        return resolve => require([`../components/${component}/${file ? file : 'index.vue'}`], resolve)
    } catch (e) {
        console.log(e)
    }
};

export default {
    view,
    component
}