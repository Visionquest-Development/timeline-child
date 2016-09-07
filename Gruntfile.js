module.exports = function(grunt) {
	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				files: [{
					expand: true,
					cwd: 'scss',
					src: ['styles.scss'],
					dest: './',
					ext: '.css'
				}]
			}
		}


	});
	
	grunt.registerTask('default', ['sass'] );
	
};