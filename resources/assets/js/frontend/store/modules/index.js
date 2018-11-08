let files = require.context('.', false, /\.js/)
let context = {};

files.keys().forEach(file => {
    if (file.match(/index/)) return
    context[file.replace('./', '').replace('.js', '')] = files(file)['default']
})

export default context