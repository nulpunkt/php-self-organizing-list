if [ "$OLD_PATH" == "" ]
then
	export OLD_PATH=$PATH;
	PATH="$PWD/vendor/bin:$PATH"
	echo "New path is ready to go"
else
	PATH=$OLD_PATH
	env -u "OLD_PATH" > /dev/null
	echo "Project path is deleted"
fi
