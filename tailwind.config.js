const path = require('path')

module.exports = {
  purge: [
    path.join(__dirname, 'resources/views/**/*.php'),
    path.join(__dirname, 'resources/js/components/**/*.vue'),
  ],
  theme: {
    fontFamily: {
      'sans': ['Ubuntu', 'ui-sans-serif', 'system-ui'],
      'serif': ['Ubuntu', 'ui-serif', 'Georgia'],
      'mono': ['Ubuntu', 'ui-monospace', 'SFMono-Regular'],
    },
    extend: {
      spacing: {
        '128': '32rems'
      }
    },
  },
  variants: {},
  plugins: [],
}
