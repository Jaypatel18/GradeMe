package parse;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.InputMismatchException;
import java.util.Scanner;

public class Util {
	public Util(){

	}
	
	public Pair<String, Integer> parseStringAndInt(String line){
		Pair<String,Integer> i;
		
		int colon = line.indexOf(':');
		String s = line.substring(0, colon-1);
		String n = line.substring(colon + 2);
		Integer c = Integer.parseInt(n);
		i = new Pair<String, Integer>(s,c);
		return i;
	}
	
	public String trimSlash(String line){
		if(line.charAt(0) == '\\' && line.charAt(1) == '\\'){
			line = line.substring(2);
		}
		return line;
	}
	public String trim(String line){
		if(line.charAt(0) == '{' && line.charAt(line.length()-1) == '}')
		{
			line = line.substring(1, line.length()-1);
		}
		return line;
	}
	public String trimSq(String line){
		if(line.charAt(0) == '[' && line.charAt(line.length()-1) == ']')
		{
			line = line.substring(1, line.length()-1);
		}
		return line;
	}
	public double scanDoubleFromString(String line){
		Scanner scan = new Scanner(line);
		scan.useDelimiter(" : ");
		double value = 0;
		while(scan.hasNext()){
			if(scan.hasNextDouble())
				value = scan.nextDouble();
			if(scan.hasNext())
				scan.next();
		}
		scan.close();
		return value;
	}
	public int scanIntFromString(String line){
		Scanner scan = new Scanner(line);
		scan.useDelimiter(" : ");
		int value = 0;
		while(scan.hasNext()){
			if(scan.hasNextInt())
				value = scan.nextInt();
			if(scan.hasNext())
				scan.next();
		}
		scan.close();
		return value;
	}
	public int scanIntType( String key, String group, File file){
		int value = -1; 
		int found = -1;
		Scanner scan;
		try {

			scan = new Scanner(file);
			while(scan.hasNextLine()){
				String line = scan.nextLine();
				if(found == -1 && line.contains(new String("[\\e "+group+"]"))){
					scan.close();
					return found;
				}
				if(found == -1 && line.contains(new String("["+group+"]"))){
					line = scan.nextLine();
				}
				if(found == -1 && line.contains(key)){
					line = trim(line);
					Scanner s = new Scanner(line);
					s.useDelimiter(key + " : ");
					try{
						if(s.hasNextInt()){
							value = s.nextInt();
						}else{
							if(s.next().equals("NULL")){
								System.out.println("LOG: Key "+ key +" was found but it did not have an int"
										+ " value attached to it. It is the NULL. Update it.");
							}
						}
					}
					catch (InputMismatchException e)
					{
						System.out.println("LOG: Key "+ key +" was found but it did not have an int"
								+ " value attached to it. Might be default. Update it.");
					}

					s.close();
					scan.close();
					found = 0;
					return value;
				}
			}
			scan.close();
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			//e.printStackTrace();
			System.out.println("LOG: File was not found when scanning for settings.");
		}


		return found;
	}

}
