import Router from 'vue-router'
import routes from './routes'
import store from '../store'

let router = new Router({
    mode: 'history',
    scrollBehavior: () => ({
        y: 0,
        x: 0
    }),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.meta.fetch) {
        if (!to.query.hasOwnProperty('page')) {
            next({
                path: to.path,
                query: {
                    page: 1
                }
            })
            return
        }

        let page = to.query.page;
        axios.get(`${to.meta.fetch.url}${to.query.page ? '?page=' + page : ''}`)
            .then(res => {
                store.dispatch(to.meta.fetch.action, res.data)
            })
            .catch(error => {
                console.log(error)
                console.error(error.response)
            })
    }

    next()
})

export default router