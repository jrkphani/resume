files=`find js -name "*.js"`

echo "=======  S  T  A  R  T  ======="
for i in $files;
do
	echo "Starting compress for "$i
    
    #Debug mode
    #java -jar compiler.jar $i --js_output_file new/$i.js
    
    #Non debug mode
    java -jar compiler.jar $i --compilation_level SIMPLE_OPTIMIZATIONS --js_output_file compressed/$i --warning_level QUIET --summary_detail_level 3
    
    echo "Compress finished for "$i
    echo "==========================="
done

echo "=======  D  O  N  E  ======="