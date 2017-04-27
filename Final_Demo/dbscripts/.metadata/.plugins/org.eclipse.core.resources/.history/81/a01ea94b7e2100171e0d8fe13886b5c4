package javacon;
import java.sql.*;
import javax.sql.*;

public class Category {
	private int id, percent;
	private String name;
	
	public Category (int i, int p, String n){
		this.id = i;
		this.percent = p;
		this.name = n;
	}
	
	public void inset(Category cat)
	{
		try{  
			Driver c = new com.mysql.jdbc.Driver();  
			Connection con=DriverManager.getConnection(  
			"jdbc:mysql://mysql.cs.iastate.edu:3306/db309ss3","dbu309ss3","MDE1MGYyODVi");  
			//here sonoo is database name, root is username and password  
			if( c.jdbcCompliant())
				System.out.println("did it!");
			
			Statement stmt=con.createStatement();  
			String sqlstmt = "INSERT INTO category (id, name, percentage) VALUES (" 
			+ cat.id + ", " + cat.name + ", " + cat.percent + " )";
			
			ResultSet rs=stmt.executeQuery(sqlstmt);  
			
			con.close();  
			}catch(Exception e){ 
				System.out.println(e);
			}  
	}
	
	public void delete(int identity)
	{
		try{  
			Driver c = new com.mysql.jdbc.Driver();  
			Connection con=DriverManager.getConnection(  
			"jdbc:mysql://mysql.cs.iastate.edu:3306/db309ss3","dbu309ss3","MDE1MGYyODVi");  
			//here sonoo is database name, root is username and password  
			if( c.jdbcCompliant())
				System.out.println("did it!");
			
			Statement stmt=con.createStatement();  
			String sqlstmt = "DELETE FROM category WHERE id=" + identity;
			
			ResultSet rs=stmt.executeQuery(sqlstmt);  
			
			con.close();  
			}catch(Exception e){ 
				System.out.println(e);
			}  
	}
	
	public void delete(String name)
	{
		try{  
			Driver c = new com.mysql.jdbc.Driver();  
			Connection con=DriverManager.getConnection(  
			"jdbc:mysql://mysql.cs.iastate.edu:3306/db309ss3","dbu309ss3","MDE1MGYyODVi");  
			//here sonoo is database name, root is username and password  
			if( c.jdbcCompliant())
				System.out.println("did it!");
			
			Statement stmt=con.createStatement();  
			String sqlstmt = "DELETE FROM category WHERE name=" + name;
			
			ResultSet rs=stmt.executeQuery(sqlstmt);  
			
			con.close();  
			}catch(Exception e){ 
				System.out.println(e);
			}  
	}
}
