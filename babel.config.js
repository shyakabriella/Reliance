module.exports = {
  presets: [
      ['@babel/preset-env', {
          targets: "defaults",
          modules: 'auto' // Ensure this is set to 'auto'
      }]
  ]
};
