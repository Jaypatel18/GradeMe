package parse;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.IOException;

public class Parser {
	
	
	public static void main(String[] args) {
		//the first argument is the file name
		File f = new File(args[0]).getAbsoluteFile();
		//creates the file if it doesn't exist
		try {
			if(!f.exists()){
				f.createNewFile();
			}
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		System.out.println(f.getAbsolutePath());
		System.out.println(f.canRead());
		System.out.println(f.exists());
		/* expected results*/
		/*String line = "{userType : 0}";
		line = line.substring(1, line.length()-1);
		System.out.println(line);
		Scanner s = new Scanner(line);
		s.useDelimiter("userType : ");
		int userType = s.nextInt();
		s.close();
		System.out.println(userType + "\\userType");
		Scanner scan = new Scanner(f);
		while(scan.hasNextLine()){
			System.out.println(scan.nextLine());
		}
		scan.close();*/
		Settings settings = new Settings(f);
		settings.scanSettings();
		Grades grades = new Grades(f);
		grades.parseGrades();
	}

}
