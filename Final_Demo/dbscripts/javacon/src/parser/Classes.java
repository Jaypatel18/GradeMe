package parser;

import java.util.ArrayList;

public class Classes{
			private int credits;
			private int grade;
			private ArrayList<GradeCategory> cats;
			
			
			
			
			public Classes(){
				this.cats = new ArrayList<>();
			}




			public ArrayList<GradeCategory> getGradeCategories() {
				return cats;
			}




			public void setGradeCategories(ArrayList<GradeCategory> cats) {
				this.cats = cats;
			}
			
		}